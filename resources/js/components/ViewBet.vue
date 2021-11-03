<template>
	<div>
	  	<div class="row" v-if="trade_view">
		    <div class="col-md-12 mb-2" v-if="show_message">
			  	<div class="alert alert-danger" role="alert">
			        <span v-html="message"></span>
			    </div>
			</div>
		    <div class="col-md-4 text-center mb-2">
		        <h5 class="text-info">Trade size</h5>
		        <input ref="betSize" v-model="betSize" @keyup="changetoWin" class="form-control round text-center" placeholder="Trade size" type="text" maxlength="15">
		        <div class="mt-2">
		          <button @click="betSize_min" type="button" class="btn btn-sm btn-secondary">MIN</button>
		          <button @click="betSize_max" type="button" class="btn btn-sm btn-secondary">MAX</button>
		          <button @click="betSize_reset" type="button" class="btn btn-sm btn-secondary">RESET</button>
		          <button @click="betSize_10" type="button" class="btn btn-sm btn-secondary">10%</button>
		        </div>
		    </div>
		    <div class="col-md-4 text-center mb-2">
		        <h5>Win Profit</h5>
		        <h2 class="text-success">
		          <span ref="win_profit" v-html="win_profit"></span> <small class="text-black">Doge</small>
		        </h2>
		        <div class="row mb-1">
		          <div class="col-lg-6 text-center">
		            <small v-html="range_low"></small><br>
		            <button type="button" @click="betLow" class="btn btn-lg btn-danger btn-rounded waves-effect waves-light">
		              <i class="ti-arrow-down"></i> Trade Low
		            </button>
		          </div>
		          <div class="col-lg-6 text-center">
		            <small v-html="range_high"></small><br>
		            <button type="button" @click="betHigh" class="btn btn-lg btn-success btn-rounded waves-effect waves-light">
		              <i class="ti-arrow-up"></i> Trade High
		            </button>
		          </div>
		        </div>

		        <div v-if="show_text">
			        <p v-if="win_lose.status === 1" class="text-success">Last bet: won <span v-html="win_lose.profit.toFixed(8)"></span> Doge <br>[<span v-html="win_lose.number"></span>] [Delayed 1 sec]</p>
			        <p v-else="win_lose.status === 2" class="text-danger">Last bet: lose <span v-html="win_lose.profit.toFixed(8)"></span> Doge <br>[<span v-html="win_lose.number"></span>] [Delayed 1 sec]</p>
		        </div>
		    </div>
		    <div class="col-md-4 text-center mb-2">
		        <h5 class="text-success">% Chance to win</h5>
		        <input ref="chancetoWin" v-model="chancetoWin" @keyup="changetoWin" @change="onChange" class="form-control round text-center" type="text" min="5">
		        <div class="mt-2">
		          <button @click="chancetoWin_min" type="button" class="btn btn-sm btn-secondary">MIN</button>
		          <button @click="chancetoWin_max" type="button" class="btn btn-sm btn-secondary">MAX</button>
		          <button @click="chancetoWin_49" type="button" class="btn btn-sm btn-secondary">49.95%</button>
		          <button @click="chancetoWin_50" type="button" class="btn btn-sm btn-secondary">50%</button>
		        </div>
		    </div>
	  	</div>
	  	<div class="row" v-else>
		    <div class="col-md-12 mb-2" v-if="show_message">
			  	<div class="alert alert-danger" role="alert">
			        <span v-html="message"></span>
			    </div>
			</div>

			<div class="col-md-12 mb-2 text-center">
	        	<h5>Automatic Trading</h5>
			</div>
		    <div class="col-md-4 text-center mb-2">
		        <h5 class="text-info">Trade size</h5>
		        <input ref="betSize" v-model="betSize" @keyup="changetoWin" class="form-control round text-center" placeholder="Trade size" type="text" maxlength="15">
		    </div>
		    <div class="col-md-4 text-center mb-2">
		        <h5 class="text-secondary">Number of Trades</h5>
		        <input ref="numTrade" v-model="numTrade" @change="onChangeNumber" class="form-control round text-center" placeholder="Number of Trades" type="text" maxlength="15">
		    </div>
		    <div class="col-md-4 text-center mb-2">
		        <h5 class="text-success">% Chance to win</h5>
		        <input ref="chancetoWin" v-model="chancetoWin" @keyup="changetoWin" @change="onChange" class="form-control round text-center" type="text" min="5">
		    </div>

		    <div class="col-md-4 text-center mb-2"></div>
		    <div class="col-md-4 mb-2 text-center">
		        <div class="row mb-1">
		          <div class="col-lg-6 text-center">
		            <small v-html="range_low"></small><br>
		            <button type="button" @click="betLowAuto" class="btn btn-lg btn-danger btn-rounded waves-effect waves-light">
		              <i class="ti-arrow-down"></i> Trade Low
		            </button>
		          </div>
		          <div class="col-lg-6 text-center">
		            <small v-html="range_high"></small><br>
		            <button type="button" @click="betHighAuto" class="btn btn-lg btn-success btn-rounded waves-effect waves-light">
		              <i class="ti-arrow-up"></i> Trade High
		            </button>
		          </div>
		        </div>
		        <div class="mb-2" v-if="show_text">
			        <p v-if="win_lose.status === 1" class="text-success">Profit <span v-html="win_lose.profit.toFixed(8)"></span> Doge <br> [# Trades: {{ win_lose.number }}] <br> Trade ID {{ win_lose.betID }}</p>
			        <p v-else="win_lose.status === 2" class="text-danger">Profit  <span v-html="win_lose.profit.toFixed(8)"></span> Doge <br> [# Trades: {{ win_lose.number }}] <br> Trade ID {{ win_lose.betID }}</p>
		        </div>
		    </div>
		    <div class="col-md-4 text-center mb-2"></div>
	  	</div>
		<div class="row">
		    <div class="col-md-12 mb-2 text-center">
		      	<button type="button" @click="trade_show" class="btn btn-sm btn-dark waves-effect waves-light"> Single Trade</button>
		      	<button type="button" @click="trade_show" class="btn btn-sm btn-dark waves-effect waves-light"> Automatic Trading</button>
		    </div>
		</div>
	</div>
</template>

<script>
  	export default {
	    props: ['balance','show_text','win_lose','message','show_message'],

	    data() {
	        return {
	            trade_view: true,
	            betSize: 0.0001,
	            chancetoWin: 49.95,
	            numTrade: 10,
	            win_profit: '',
	            range_low: '',
	            range_high: ''
	        }
	    },

	    mounted() {
	        // console.log('BetA Component mounted.');
	    },

	    created() {
	    	this.changetoWin();
	    },

	    methods: {
		    betHigh() {
		    	this.onChange();
				this.$root.betHigh(this.betSize,this.chancetoWin);
		    },
		    betLow() {
		    	this.onChange();
				this.$root.betLow(this.betSize,this.chancetoWin);
		    },
		    betHighAuto() {
		    	this.onChange();
				this.$root.betHighAuto(this.betSize,this.chancetoWin,this.numTrade);
		    },
		    betLowAuto() {
		    	this.onChange();
				this.$root.betLowAuto(this.betSize,this.chancetoWin,this.numTrade);
		    },
		    betSize_min(){
		    	if(this.balance > 0 ){
		    		this.betSize = "0.00000001";
		    	}else{
		    		this.betSize = 0;
		    	}
		    	this.changetoWin();
		    },
		    betSize_max(){
		    	this.betSize = this.balance;
		    	this.changetoWin();
		    },
		    betSize_reset(){
		    	if(this.balance > 0 ){
		    		this.betSize = 0.0001;
		    	}else{
		    		this.betSize = 0;
		    	}
		    	this.changetoWin();
		    },
		    betSize_10(){
		    	this.betSize = (this.balance * 0.1);
		    	this.changetoWin();
		    },
		    chancetoWin_min(){
		    	this.chancetoWin = 5;
		    	this.changetoWin();
		    },
		    chancetoWin_max(){
		    	this.chancetoWin = 95;
		    	this.changetoWin();
		    },
		    chancetoWin_49(){
		    	this.chancetoWin = 49.95;
		    	this.changetoWin();
		    },
		    chancetoWin_50(){
		    	this.chancetoWin = 50;
		    	this.changetoWin();
		    },
		    changetoWin() {
		    	var chancetoWin = this.chancetoWin
			    var betSize = this.betSize;
		        var low = (chancetoWin * 10000) - 1;
		        var high = ((100 - chancetoWin) * 10000);
				var hasil = ((betSize * 0.999) / (chancetoWin/100).toFixed(8)) - betSize;
    			if(!isNaN(hasil) && hasil != Infinity){
			        this.range_low = '0 - '+low;
			        this.range_high = high +' - 999999';
			        this.win_profit = hasil.toFixed(8);
			    }else{
			    	this.range_low = '';
			        this.range_high = '';
			        this.win_profit = 0;
			    }
		    },
		    onChange(){
		    	var chancetoWin = this.chancetoWin
			    var betSize = this.betSize;
		        if(chancetoWin < 5){
		          chancetoWin = 5;
		          this.chancetoWin = chancetoWin;
		        }else if(chancetoWin > 95){
		          chancetoWin = 95;
		          this.chancetoWin = chancetoWin;
		        }
		    	this.changetoWin();
		    },
		    trade_show() {
		    	if(this.trade_view == true){
		    		this.trade_view = false;
		    	}else{
		    		this.trade_view = true;
		    	}
		    },
		    onChangeNumber(){
			    var numTrade = this.numTrade;
		        if(numTrade <= 0){
		          this.numTrade = 1;
		        }
		    },
		}
	};
</script>
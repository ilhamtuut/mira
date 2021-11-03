
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('AllBet', require('./components/AllBet.vue'));
Vue.component('MyBet', require('./components/MyBet.vue'));
Vue.component('HistoryDeposit', require('./components/HistoryDeposit.vue'));
Vue.component('HistoryWithdraw', require('./components/HistoryWithdraw.vue'));
Vue.component('Balance', require('./components/Balance.vue'));
Vue.component('ViewBet', require('./components/ViewBet.vue'));
Vue.component('Dogecoin', require('./components/Dogecoin.vue'));
Vue.component('Withdraw', require('./components/Withdraw.vue'));

const app = new Vue({
    el: '#app',

    data: {
	    bets: [],
        my_bets: [],
        my_deposit: [],
        my_withdraw: [],
        balance: 0,
        show_text: false,
        win_lose: [],
        show_message: false,
        loading: false,
        message: ''
    },

    created() {
    	this.fetchMyBalance();
        this.fetchBets();
        Echo.channel('bet-data')
            .listen('BetData', (e) => {
            	// console.log("Update " + JSON.stringify(e.bet));
                this.bets.push(e.bet);
        });

        Echo.private('my-balance.' + window.Laravel.user)
            .listen('MyBalance', (e) => {
                this.fetchMyBalance();
        });
    },

    methods: {
        fetchBets() {
            axios.get('/trade/all').then(response => {
                this.bets = response.data;
            });
        },
        fetchMyBets() {
            axios.get('/trade/my_bet').then(response => {
                this.my_bets = response.data;
            });
        },
        betHigh(betSize,chancetoWin) {
        	var params = {
		        betSize: betSize,
		        chancetoWin: chancetoWin
		    }

            axios.post('/trade/bet/high', params).then(response => {
            	if(response.data.success){
	    			this.fetchMyBalance();
			        this.fetchMyBets();
			        this.show_text = true;
			        this.win_lose = response.data.data;
			    }else{
            		this.message = response.data.message;
            		this.show_message = true;
            		this.hideMessage();
            	}
            });
        },
        betLow(betSize,chancetoWin) {
        	var params = {
		        betSize: betSize,
		        chancetoWin: chancetoWin
		    }

            axios.post('/trade/bet/low', params).then(response => {
            	if(response.data.success){
	    			this.fetchMyBalance();
			        this.fetchMyBets();
			        this.show_text = true;
			        this.win_lose = response.data.data;
            	}else{
            		this.message = response.data.message;
            		this.show_message = true;
            		this.hideMessage();
            	}
            });
        },
        betHighAuto(betSize,chancetoWin,number) {
            var params = {
                betSize: betSize,
                chancetoWin: chancetoWin,
                number: number
            }

            axios.post('/trade/bet_auto/high', params).then(response => {
                if(response.data.success){
                    this.fetchMyBalance();
                    this.fetchMyBets();
                    this.show_text = true;
                    this.win_lose = response.data.data;
                }else{
                    this.message = response.data.message;
                    this.show_message = true;
                    this.hideMessage();
                }
            });
        },
        betLowAuto(betSize,chancetoWin,number) {
            var params = {
                betSize: betSize,
                chancetoWin: chancetoWin,
                number: number
            }

            axios.post('/trade/bet_auto/low', params).then(response => {
                if(response.data.success){
                    this.fetchMyBalance();
                    this.fetchMyBets();
                    this.show_text = true;
                    this.win_lose = response.data.data;
                }else{
                    this.message = response.data.message;
                    this.show_message = true;
                    this.hideMessage();
                }
            });
        },
        fetchMyDeposit() {
            this.loading = true;
            axios.get('/trade/my_deposit').then(response => {
                this.my_deposit = response.data;
                this.loading = false;
            });
        },
        fetchMyWithdraw() {
            this.loading = true;
            axios.get('/trade/my_withdraw').then(response => {
                this.my_withdraw = response.data;
                this.loading = false;
            });
        },
        fetchMyBalance() {
            axios.get('/trade/my_balance').then(response => {
                this.balance = response.data.balance;
            });
        },
        hideMessage() {
        	var $this = this;
            setTimeout(function () {
        		$this.show_message = false;
            }, 3000);
        },
        showModal() {
		    // $('#loading').modal('show');
		    // this.$refs['modal'].show();
		},
        hideModal() {
		    // this.$refs['modal'].hide();
		    // $('#loading').modal('hide');
		}
    },

  	beforeMount () {
    	this.showModal();
  	},

    mounted() {
        this.hideModal();
    },
});

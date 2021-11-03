<template>
	<div class="m-b-3">
	  	<div v-show="show_message" class="alert alert-danger m-b-2" role="alert">
	        <span v-html="message"></span>
	    </div>

	    <div v-if="errors.length" class="alert alert-danger m-b-2" role="alert">
		    <b>Please correct the following error(s):</b>
	        <ul>
		      <li v-for="error in errors">{{ error }}</li>
		    </ul>
	    </div>
      	
      	<div class="form-group m-b-0">
            <div class="checkbox">
              <label class="m-r-3">
                <input type="checkbox" :checked="checkbox_address" @change="checkbox_action('address',true)">
                Address </label>
              <label>
                <input type="checkbox" :checked="checkbox_account" @change="checkbox_action('account',true)">
                Account ID </label>
            </div>
      	</div>
	    <div class="form-group m-b-1" v-if="show_input">
	        <input v-model="address" type="text" class="form-control" placeholder="Address">
	    </div>
      	<div class="form-group m-b-1" v-else>
	        <input v-model="account_id" type="text" class="form-control" placeholder="Account ID">
      	</div>
      	<div class="form-group">
	        <label>Amount</label>
	        <input v-model="amount" type="number" class="form-control" placeholder="Amount">
      	</div>
      	<div v-show="button">
		    <button class="btn btn-sm btn-success btn-rounded w-100" @click="validationForm">Withdraw</button>
		</div>
		<div v-show="!button">
			<i class="fa fa-spinner fa-spin"></i>
		</div>
    </div>
</template>

<script>
  export default {
    data() {
        return {
            button: true,
            checkbox_address: true,
            checkbox_account: false,
            show_input: true,
            show_message: false,
            message : '',
            type : 'address',
            address : '',
            account_id : '',
            amount : '',
            errors: []
        }
	},

	methods: {
		checkbox_action(type,click){
			if(click && type == 'address'){
				this.checkbox_address = true;
				this.checkbox_account = false;
				this.show_input = true;
				this.type = 'address';
				this.account_id = '';
			}else{
				this.checkbox_address = false;
				this.checkbox_account = true;
				this.show_input = false;
				this.type = 'account';
				this.address = '';
			}
		},
		validationForm(){
			this.errors = [];
	    	if(this.type == 'address'){
	    		if (this.address && this.amount && this.amount >= 10) {
	      			this.withdraw();
		      	}else{
		      		if (!this.address) {
				        this.errors.push('Address required.');
				    }

		      	}
	    	}else{
	    		if (this.account_id && this.amount && this.amount >= 10) {
	      			this.withdraw();
		      	}else{
		      		if (!this.account_id) {
				        this.errors.push('Account ID required.');
				    }
		      	}
	    	}

		    if (!this.amount) {
		        this.errors.push('Amount required.');
		    }

		    if (this.amount < 10) {
		        this.errors.push('Amount must be greater than or equal 10.');
		    }
		},
	    withdraw() {
            this.button = false;
            var params = {
		        type: this.type,
		        address: this.address,
		        account_id: this.account_id,
		        amount: this.amount
		    }

            axios.post('/trade/withdraw', params).then(response => {
            	this.button = true;
            	this.address = '';
		        this.account_id = '';
		        this.amount = '';
            	if(response.data.success){
            		this.$root.fetchMyBalance();
            		this.$root.fetchMyWithdraw();
			    }else{
            		this.message = response.data.message;
            		this.show_message = true;
            		this.hideMessage();
            	}
            });
	    },
        hideMessage() {
        	var $this = this;
            setTimeout(function () {
        		$this.show_message = false;
            }, 3000);
        },
	},

    mounted() {
        // console.log('Bet Component mounted.');
    }
  };
</script>
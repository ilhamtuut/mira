<template>
	<div v-if='haveAddress'>
	    <h6>Your Address Dogecoin : <b v-html="address"></b></h6>
	    <img class="ui-img-150 border" alt="Image of QR barcode" v-bind:src="imgSrc">
	</div>
	<div v-else>
		<div v-show="button">
		    <button class="btn btn-sm btn-success btn-rounded" @click="createAddress">Create Dogecoin</button>
		</div>
		<div v-show="!button">
			<i class="fa fa-spinner fa-spin"></i>
		</div>
	</div>
</template>

<style scoped>
	.border {
		border: 1px solid;
	}
</style>

<script>
  	export default {
	  	data() {
	        return {
	            button: true,
	            haveAddress: false,
	            address: '',
	            imgSrc: ''
	        }
	    },

	    created() {
	    	this.getAddress();
	    },

	    methods: {
		    getAddress() {
		    	axios.get('/trade/my_doge').then(response => {
	                if(response.data.have){
				        this.haveAddress = true;
				        this.address = response.data.address;
				        this.imgSrc = response.data.img;
	            	}
	            });
		    },

		    createAddress() {
	            this.button = false;
		    	axios.get('/trade/create_doge').then(response => {
	    			this.getAddress();
	            });
		    }
		},

	    mounted() {
	        // console.log('Bet Component mounted.');
	    }
  	};
</script>
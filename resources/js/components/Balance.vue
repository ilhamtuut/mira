<template>
  <span id="balance_doge" class="text-success">{{ formatPrice(balance) }}</span>
</template>

<script>
  export default {
    props: ['balance'],
    methods: {
        formatPrice(value) {
            let val = (value/1).toFixed(8);
            return val.toString();
        }
    },
    mounted() {
        // console.log('Bet Component mounted.');
    }
  };
</script>
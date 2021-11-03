<template>
    <table class="table table-hover text-center">
        <thead class="thead-light">
          <tr>
            <th scope="col">Address</th>
            <th scope="col">Amount</th>
            <th scope="col">Date</th>
            <th scope="col">Transaction Hash</th>
          </tr>
        </thead>
        <tbody v-if="my_deposit.length">
            <tr v-if="loading">
                <td colspan="4"class="text-center"><i class="fa fa-spinner fa-spin"></i></td>
            </tr>
            <tr v-else v-for="value in sortArrays(my_deposit)">
                <td>{{ value.address }}</td>
                <td>{{ value.amount }} Doge</td>
                <td>{{ value.created_at }}</td>
                <td style="word-wrap: break-word;">
                    <a v-if="value.description == 'Deposit Dogecoin' " :href="'https://dogechain.info/tx/' + value.tx_hash" target="_blank">{{ value.tx_hash }}</a>
                    <a v-else :href="'#'">{{ value.description }}</a>
                </td>
            </tr>
        </tbody>
        <tbody v-else>
            <tr v-if="loading">
                <td colspan="4"class="text-center"><i class="fa fa-spinner fa-spin"></i></td>
            </tr>
            <tr v-else>
                <td colspan="4">Empty</td>
            </tr>
        </tbody>
      </table>
</template>

<script>
  export default {
    props: ['my_deposit','loading'],
    mounted() {
        // console.log('Bet Component mounted.');
    },
    methods: {
        sortArrays(arrays) {
            return _.orderBy(arrays, 'id', 'desc');
        }
    }
  };
</script>
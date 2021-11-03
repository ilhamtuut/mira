<template>
    <table class="table table-hover text-center">
        <thead class="thead-light">
          <tr>
            <th scope="col">Address</th>
            <th scope="col">Amount</th>
            <th scope="col">Fee</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody v-if="my_withdraw.length">
            <tr v-if="loading">
                <td colspan="5"class="text-center"><i class="fa fa-spinner fa-spin"></i></td>
            </tr>
            <tr v-else v-for="value in sortArrays(my_withdraw)">
                <td>{{ value.address }}</td>
                <td>{{ value.amount - value.fee }} Doge</td>
                <td>{{ value.fee }} Doge</td>
                <td>
                    <span v-if="value.status === 1" class="text-success">
                        <a v-if="value.description == 'Withdraw Dogecoin' " :href="'https://dogechain.info/tx/' + value.tx_hash" target="_blank" class="text-success">Completed</a>
                        <a v-else href="#" class="text-success">Completed</a>
                    </span>
                    <span v-else="value.status === 2" class="text-danger">Pending</span>
                </td>
                <td>{{ value.created_at }}</td>
            </tr>
        </tbody>
        <tbody v-else>
            <tr v-if="loading">
                <td colspan="5"class="text-center"><i class="fa fa-spinner fa-spin"></i></td>
            </tr>
            <tr v-else>
                <td colspan="5">Empty</td>
            </tr>
        </tbody>
      </table>
</template>

<script>
  export default {
    props: ['my_withdraw','loading'],
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
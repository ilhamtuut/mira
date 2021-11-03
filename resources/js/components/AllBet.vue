<template>
    <table class="table table-hover text-center">
        <thead class="thead-light">
          <tr>
            <th scope="col">Player</th>
            <th scope="col">Number</th>
            <th scope="col">Target</th>
            <th scope="col">Bet Size</th>
            <th scope="col">Profit</th>
          </tr>
        </thead>
        <tbody v-if="bets.length">
            <tr v-for="value in sortArrays(bets)">
              <td>{{ value.account.username }} ({{ value.account.accountID }})</td>
              <td>
                  <div v-if="value.autobet.length">
                    <span v-if="value.status === 1" class="text-success"><a :href="'trade/info?q=' + value.betID" class="text-success" target="_blank">[Wins: {{ value.win.length }}/{{ value.autobet.length }}]</a></span>
                    <span v-else="value.status === 0" class="text-danger"><a :href="'trade/info?q=' + value.betID" class="text-danger" target="_blank">[Wins: {{ value.win.length }}/{{ value.autobet.length }}]</a></span>
                  </div>
                  <div v-else>
                    <span v-if="value.status === 1" class="text-success"><a :href="'trade/info?q=' + value.betID" class="text-success" target="_blank" v-html="formatNumber(value.number)"></a></span>
                    <span v-else="value.status === 0" class="text-danger"><a :href="'trade/info?q=' + value.betID" class="text-danger" target="_blank" v-html="formatNumber(value.number)"></a></span>
                  </div>
              </td>
              <td>
                  <span v-if="value.type === 'high'" v-html=" '>' + formatNumber(value.target)"></span>
                  <span v-else="value.type === 'low'" v-html=" '<' + formatNumber(value.target)"></span>
              </td>
              <td>{{ value.bet.toFixed(8) }} Doge</td>
              <td>
                  <span v-if="value.status === 1" class="text-success">+{{ value.profit.toFixed(8) }}</span>
                  <span v-else="value.status === 0" class="text-danger">
                    <span v-if="value.profit < 0">{{ value.profit.toFixed(8) }}</span>
                    <span v-else>-{{ value.profit.toFixed(8) }}</span>
                  </span>
              </td>
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
    props: ['bets','loading'],
    mounted() {
        // console.log('Bet Component mounted.');
    },
    methods: {
        sortArrays(arrays) {
            return _.orderBy(arrays, 'id', 'desc');
        },
        formatNumber(value) {
            let val = (value/1).toFixed(0).replace('.', ',');
            var new_val = val.toString().replace(/\B(?=(\d{4})+(?!\d))/g, ".");
            if(value.toString().length == 1){
                new_val = "00.000" + value;
            }else if(value.toString().length == 2){
                new_val = "00.00" + value;
            }else if(value.toString().length == 3){
                new_val = "00.0" + value;
            }else if(value.toString().length == 4){
                new_val = "00." + value;
            }else if(value.toString().length == 5){
                new_val = "0" + new_val;
            }

            let val1 = new_val.split(".");
            let sm0 = val1[0];
            let sm1 = val1[1].slice(0,2);
            let sm2 = val1[1].slice(2);
            let result = sm0+'.'+sm1+"<small>"+sm2+"</small>";
            return result;
        }
    }
  };
</script>
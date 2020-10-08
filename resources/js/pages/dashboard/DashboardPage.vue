<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Deposite wallet -->
            <div class="col-md-4 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Account balance</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ account_balance }}
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-ruble-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Interest Wallet -->
            <div class="col-md-4 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total deposits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ total_deposites }}
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-ruble-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Investment -->
            <div class="col-md-4 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total withdrawals</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            {{ tota_withdraw }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-ruble-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Withdraw -->
            <div class="col-md-4 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Referrals</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ total_referrals }}
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-ruble-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Ticket -->
            <div class="col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Investment In Pools</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      {{ total_pools }}  
                    </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-ruble-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <!-- Total Deposite -->
            <div class="col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Lottery Win</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      {{ lottery_win }}
                    </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-ruble-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            req: axios.create({
                baseUrl:  BASE_URL
            }),
            account_balance: 0,
            total_deposites: 0,
            tota_withdraw: 0,
            total_referrals: 0,
            total_pools: 0,
            lottery_win: 0,
        }
    },
    mounted() {
      this.getIndicadores();
    },
    methods:{
      getIndicadores(){
            this.req.get('dashboard/indicadores').then((response)=>{
                this.account_balance = response.data.account_balance;
                this.total_deposites = response.data.total_deposites;
                this.tota_withdraw = response.data.tota_withdraw;
                this.total_referrals = response.data.total_referrals;
                this.total_pools = response.data.total_pools;
                this.lottery_win = response.data.lottery_win;
                console.log(response);
            }, (response)=>{
                console.log(response.data);
            });
        }
    }
}
</script>

<style>
</style>
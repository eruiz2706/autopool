<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Deposite</h1>
    </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    RUB
                    <div class="text-white-100 float-right">$ 100</div>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-light text-black shadow">
                <div class="card-body">
                    RUB
                    <div class="text-black-100 float-right">$ 200</div>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-light text-black shadow">
                <div class="card-body">
                    RUB
                    <div class="text-black-100 float-right">$ 300</div>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-light text-black shadow">
                <div class="card-body">
                    RUB
                    <div class="text-black-100 float-right">$ 500</div>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-light text-black shadow">
                <div class="card-body">
                    RUB
                    <div class="text-black-100 float-right">$ 700</div>
                </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-light text-black shadow">
                <div class="card-body">
                    RUB
                    <div class="text-black-100 float-right">$ 1000</div>
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New deposite</h6>
                    </div>
                    <div class="card-body">
                        <div class="callout callout-info">
                            <p>
                                <i class="fa fa-fw fa-info"></i>
                                The minimum amount is 100 Rub
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="nombre" class="form-control" value="100"> 
                        </div>

                        <a href="#" class="btn btn-primary">
                            <span class="text">Pay</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="https://s3-eu-west-1.amazonaws.com/tpd/screenshotlogo-domain/5817fb050000ff000596da8c/198x149.png" alt="">
            </div>
        </div>
</div>
</template>

<script>
export default {
    mounted() {
    
    },
    methods:{
    }
}
</script>

<style>
</style>
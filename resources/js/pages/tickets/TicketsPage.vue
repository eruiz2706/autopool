<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tickets List</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white-50"></i> New Ticket</a>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 ">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h1 mb-0 font-weight-bold text-primary text-center text-uppercase">3</div>
                    <div class="text-xs font-weight-bold text-gray-800 text-center text-uppercase">Total</div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 ">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h1 mb-0 font-weight-bold text-info text-center text-uppercase">0</div>
                    <div class="text-xs font-weight-bold text-gray-800 text-center text-uppercase">Pending</div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 ">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h1 mb-0 font-weight-bold text-warning text-center text-uppercase">1</div>
                    <div class="text-xs font-weight-bold text-gray-800 text-center text-uppercase">In progress</div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 ">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h1 mb-0 font-weight-bold text-danger text-center text-uppercase">1</div>
                    <div class="text-xs font-weight-bold text-gray-800 text-center text-uppercase">Closed</div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow ">
                <div class="card-header pt-4">
                  <h6 class="font-weight-bold text-primary">Tickets List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Title</th>
                                                <th>ID</th>
                                                <th>Created by</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span class="badge badge-warning">In Progress</span></td>
                                                <td><a href="ticket-detail.html" class="font-medium link">Elegant Theme Side Menu Open OnClick</a></td>
                                                <td><a href="ticket-detail.html" class="font-bold link">276377</a></td>
                                                <td>Eric Pratt</td>
                                                <td>2018/05/01</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-danger">Closed</span></td>
                                                <td><a href="ticket-detail.html" class="font-medium link">AdminX Theme Side Menu Open OnClick</a></td>
                                                <td><a href="ticket-detail.html" class="font-bold link">1234251</a></td>
                                                <td>Nirav Joshi</td>
                                                <td>2018/05/11</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-success">Pending</span></td>
                                                <td><a href="ticket-detail.html" class="font-medium link">Admin-Pro Theme Side Menu Open OnClick</a></td>
                                                <td><a href="ticket-detail.html" class="font-bold link">1020345</a></td>
                                                <td>Vishal Bhatt</td>
                                                <td>2018/04/01</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-warning">In Progress</span></td>
                                                <td><a href="ticket-detail.html" class="font-medium link">Elegant Theme Side Menu Open OnClick</a></td>
                                                <td><a href="ticket-detail.html" class="font-bold link">7810203</a></td>
                                                <td>Eric Pratt</td>
                                                <td>2018/01/01</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-warning">In Progress</span></td>
                                                <td><a href="ticket-detail.html" class="font-medium link">AdminX Theme Side Menu Open OnClick</a></td>
                                                <td><a href="ticket-detail.html" class="font-bold link">2103450</a></td>
                                                <td>Nirav Joshi</td>
                                                <td>2018/05/01</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-warning">In Progress</span></td>
                                                <td><a href="ticket-detail.html" class="font-medium link">Admin-Pro Theme Side Menu Open OnClick</a></td>
                                                <td><a href="ticket-detail.html" class="font-bold link">2140530</a></td>
                                                <td>Vishal Bhatt</td>
                                                <td>2018/07/01</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-success">Pending</span></td>
                                                <td><a href="ticket-detail.html" class="font-medium link">Elegant Theme Side Menu Open OnClick</a></td>
                                                <td><a href="ticket-detail.html" class="font-bold link">4500123</a></td>
                                                <td>Eric Pratt</td>
                                                <td>2018/05/10</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-danger">Closed</span></td>
                                                <td><a href="ticket-detail.html" class="font-medium link">Elegant Theme Side Menu Open OnClick</a></td>
                                                <td><a href="ticket-detail.html" class="font-bold link">1230450</a></td>
                                                <td>Eric Pratt</td>
                                                <td>2018/05/14</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-danger">Closed</span></td>
                                                <td><a href="ticket-detail.html" class="font-medium link">AdminX Theme Side Menu Open OnClick</a></td>
                                                <td><a href="ticket-detail.html" class="font-bold link">1240503</a></td>
                                                <td>Nirav Joshi</td>
                                                <td>2018/02/01</td>
                                            </tr>
                                            <tr>
                                                <td><span class="badge badge-success">Pending</span></td>
                                                <td><a href="ticket-detail.html" class="font-medium link">Admin-Pro Theme Side Menu Open OnClick</a></td>
                                                <td><a href="ticket-detail.html" class="font-bold link">1250304</a></td>
                                                <td>Vishal Bhatt</td>
                                                <td>2018/05/21</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Status</th>
                                                <th>Title</th>
                                                <th>ID</th>
                                                <th>Created by</th>
                                                <th>Date</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="d-flex align-items-center justify-content-end">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
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
    mounted() {
    
    },
    methods:{
    }
}
</script>

<style>
</style>
@extends('layouts.default')

@section('content')     
        <div class="container" ng-app="MyApp" ng-controller="TransactionFormController">
            <div class="row">
            <form class="form-horizontal" method='post' action='{{ url('/transactions/add') }}'> 
                <input type="hidden" name="client_id"/>
                <h4> Add New Transaction </h4><br>
            <div class="col-md-12">
                <div class="form-group">
                    <table class="table table-bordered">
                        <thead>
                            <th>Package</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </thead>
                        
                            <tbody>
                            <tr ng-repeat="package in packages">
                                <td class="per20">
                                    <select                                      
                                        ng-model="package.selectedPackage" 
                                        ng-options="value.product.name + ' ' + value.unit.name for value in products track by value.id"
                                        class="form-control"
                                        ng-change="calculatePrice(package); calculateTotal()"
                                        
                                    >
                                    </select>
                                </td>
                                <td class="per20" ng-init="package.selectedPackage.base_price = 0; package.price=0;">
                                    @{{ package.selectedPackage.base_price }}
                                </td>
                                 <td class="per20">
                                     <input type="hidden" name="packages[@{{ $index }}][package_id]" value="@{{ package.selectedPackage.id }}"/>
                                    <input type="text" class="form-control" id="quantity" name="packages[@{{ $index }}][quantity]" ng-model="package.quantity" ng-change="calculatePrice(package); calculateTotal()" ng-init="package.quantity = 1">
                                </td>
                                 <td>
                                    @{{ "£"+package.price }}
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary" ng-click="removePackage($index)" value="Remove"/>
                                </td>
                            </tr>
                            <tr class="success">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="per20">
                                    @{{ "£"+totalPrice }}
                                </td>
                                <td></td>
                            </tr>
                            <tbody>
                        
                    </table>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="control-label"></label>
                    <div>
                            <button type="button" ng-click="addPackage(); calculateTotal()"class="btn btn-default">Add Item</button>
                            <button type="submit" class="btn btn-primary">Process Transaction</button>
                    </div>
                </div>
                </div>
            </form>
            </div>
<script type="text/javascript">
    var app = angular.module("MyApp", []);

    app.controller('TransactionFormController',function($scope,$http){
      
        $scope.packages = [{}];
        $scope.totalPrice = 0;
        $scope.addPackage = function(){
            $scope.packages.push({})
        }
        
        $scope.removePackage = function($index){
            //console.log($index);
            var length = $scope.packages.length;
            if(length > 1){
                $scope.packages.splice($index,1);
            }else{
                alert('There must be at least one product!');
            }
        }
        
        $scope.calculateTotal = function(){
            count = 0; 
            angular.forEach($scope.packages,function(value,index){
                if(value.price != null){
                    count += value.price;
                }
            });
            $scope.totalPrice = count;
        }
        
        $scope.calculatePrice = function(package){
            package.price = package.selectedPackage.base_price * package.quantity;
        }
        
        $http.get("/product/packages").success(function(response) {
            $scope.products = response;
        });
    });

</script>
           
@stop
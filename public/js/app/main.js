/**
 * Created by albert on 16.11.16.
 */
var app = angular.module("crudApp", []);
app.controller("crudCtrl", function($scope) {
    $scope.products = ["Milk", "Bread", "Cheese"];
});
var app = angular.module('myApp', []);

app.controller('myController', ['$scope', '$http', function($scope, $http) {
	$scope.$watch('myForm.barcodeid.$valid', function(newValue, oldvalue) {
		if(newValue) {
			var stringdata = 'barcodeid=' + $scope.modelbarcode;
			$http({
				method: 'POST',
				url: 'view/viewprocess/' + $scope.modelbarcode,
				data: stringdata,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.success(function(data) {
				console.log(data);
				//$scope.dataTrim = data.trim();
				if(data.trim() === 'success') {
					$scope.errorMsg = 'Terima kasih, data anda telah tercatat.';
					
				} else {
					$scope.errorMsg = 'Silahkan scan kartu anda dimesin scanner.';
				}
				$scope.modelbarcode = null;
			});
			console.log($scope.errorMsg);
		}
	});
	
}]);
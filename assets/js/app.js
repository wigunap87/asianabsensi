var app = angular.module('myApp', []);

app.controller('myController', ['$scope', '$http', '$interval', function($scope, $http, $interval) {
	/*$scope.$watch('myForm.barcodeid.$valid', function(newValue, oldvalue) {
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
	});*/
	
	$scope.myAbsen = function() {
		var stringdata = 'barcode=' + $scope.modelbarcode;
		
		$http({
			method: 'POST',
			url: 'view/viewprocess/' + $scope.modelbarcode,
			data: stringdata,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		})
		.success(function(data) {
			console.log(data);
			if(data.trim() === 'success') {
				$scope.errorMsg = 'Terima kasih, data anda telah tercatat.';
				$scope.datakaryawan = 'Absen pagi Anda . Sisa waktu istirahat anda . Anda harus kembali sebelum jam ... biar gak dianggap telat.';
				$scope.datamonth = 'Bulan ini anda : ';
			} else {
				$scope.errorMsg = 'Silahkan scan kartu anda dimesin scanner.';
				$scope.datakaryawan = '';
				$scope.datamonth = '';
			}
		});
		
		console.log($scope.modelbarcode);
	}
	
	
	
}]);

app.controller('myClock', ['$scope', '$interval', function($scope, $interval) {
	var tick = function() {
		$scope.clock = Date.now();
	}
	tick();
	$interval(tick, 1000);
}]);
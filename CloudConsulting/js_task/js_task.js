
(function KladkoTest() {

	/*

	1) Реализовать функцию spacify, которая принимает аргумент типа строка и возвращает ту же строку, только с пробелами после каждого символа. Например:
	spacify('hello world') // => 'h e l l o  w o r l d'

	*/

	function spacify(s) {
		var letters = s.split(' ').join('').split('').join(' ');
		return letters;
	}

	/*

	2) Как реализовать поддержку такого вызова. 	 'hello world'.spacify();
	 */

	String.prototype.spacify = function() {
		return spacify(this);
	};

	function $$(id) {
		return document.getElementById(id);
	}

	/*

	3) Реализовать алгоритм нахождения числа в диапозоне (1 – 999), 
	для которого будет верно следующее утверждение: результат суммы цифр числа умноженной на произведение цифр числа равен самому числу.  
	Пример число 64,  сумма цифр 6+4 =10,  произведение цифр 6*4 = 24,  умножение суммы цифр и произведения цифр 10 * 24 = 240
	64 ≠ 240 значит число не является искомым.

	*/

	function calcMagicProduct(n) {
		var digits = n.toString().split('');
		var sum = digits.reduce(function(a, b) {return parseInt(a, 10) + parseInt(b, 10);}, 0);
		var product = digits.reduce(function(a, b) {return parseInt(a, 10) * parseInt(b, 10);}, 1);
		return sum * product;
	}

	function magicNumbers(N) {
		var result = {
			"magics": [],
			"chart": []
		};
		var magicProduct;
		for (var i = 1; i <= N; ++i) {
			magicProduct = calcMagicProduct(i);
			if (i === magicProduct) {
				result["magics"].push(i);
			}
			result["chart"].push([i.toString(), i, magicProduct, i]);
		}
		return result;
	}

	/*
		Show me result		
	*/

	$$('js_task1').innerHTML = "1) spacify('hello world'): " + spacify('hello world');
	$$('js_task2').innerHTML = "2) 'hello world'.spacify(): " + 'hello world'.spacify();

	google.setOnLoadCallback(drawChart);
	function drawChart() {
	    var data = new google.visualization.DataTable();
	    data.addColumn('string', 'x');
	    data.addColumn('number', 'values');
	    data.addColumn({id:'i0', type:'number', role:'interval'});
	    data.addColumn({id:'i0', type:'number', role:'interval'});

	    data.addRows(magicNumbers(999)["chart"]);

	    // var options_lines = {
	    //     title: 'Line intervals, default',
	    //     curveType:'function',
	    //     lineWidth: 2,
	    //     intervals: { 'style':'line' }, // Use line intervals.
	    //     legend: 'none'
	    // };

	    // var options_bars = {
	    //     title: 'Bars, default',
	    //     curveType: 'function',
	    //     series: [{'color': '#D9544C'}],
	    //     intervals: { style: 'bars' },
	    //     legend: 'none'
    	// };

    	// var options_box = {
	    //     series: [{'color': '#1A8763'}],
	    //     intervals: { style: 'boxes' },
	    //     legend: 'none'
    	// };


	    // var options_points = {
	    //     title:'Points, default',
	    //     curveType:'function',
	    //     lineWidth: 4,
	    //     series: [{'color': '#D3362D'}],
	    //     intervals: { 'style':'points', pointSize: 2 },
	    //     legend: 'none'
    	// };

    	// var options_area = {
	    //     title:'Area, default',
	    //     curveType:'function',
	    //     series: [{'color': '#F1CA3A'}],
	    //     intervals: { 'style':'area' },
	    //     legend: 'none'
	    // };

    	var options_sticks = {
	        title:'Sticks, default',
	        curveType:'function',
	        series: [{'color': '#E7711B'}],
	        intervals: { style: 'sticks' },
	        legend: 'none'
	    };
	    var chart_lines = new google.visualization.LineChart($$('js_task3'));
	    chart_lines.draw(data, options_sticks);
	}

})();

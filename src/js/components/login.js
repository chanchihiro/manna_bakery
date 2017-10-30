import $ from 'jquery';

$(function() {
	console.log("ヨミコッm");
	$.ajax({
		url: '../rss.php',
		xmlType: 'xml',
		success: function(xml) {
			console.log("成功")
			var row = 0;
			var data = [];
			var nodeName;
			var output = $('#rss');
// start item 成形
			$(xml).find('item').each(function() {
				data[row] = {};
				$(this).children().each(function() {
				    nodeName = $(this)[0].nodeName;
				    data[row][nodeName] = {};
				    attributes = $(this)[0].attributes;
				    for (var i in attributes) {
						data[row][nodeName][attributes[i].name] = attributes[i].value;
				    }
					data[row][nodeName]['text'] = $(this).text();
				});
				row++;
			});
// end item 成形
			output.wrapInner('<ul></ul>');
			for (i in data) {			
				output.find('ul').append('<li><a href="' + data[i].link.text + '">' + data[i].title.text + '</a>' + data[i].description.text + '</li>');
				console.log (data[i]);
			}
        }
    });
});
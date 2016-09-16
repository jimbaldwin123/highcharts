// TODO

//  - make slider for years
//  - put into elixir/gulp

function toTitleCase(str){
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}
$(document).ready(function(){
    $.ajax({
        url: '/chart/json',
        type: 'GET',
        success: function(data) {
            var hcdata = {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'U.S. Treasury, Bills Printed by Year - from Database'
                },
                xAxis: {
                    categories: [
                    ]
                },
                yAxis: {
                    title: {
                        text: 'Number of Bills'
                    }
                },
                series: []
            }

            var aRow = [];
            var names = ['ones','twos','fives','tens','twenties','fifties','hundreds'];

            data.forEach(function(entry) {
                hcdata.xAxis.categories.push(entry.year);
            });

            names.forEach(function(name){

                aRow[name] = {name: '', data:[]};
                aRow[name].name = toTitleCase(name);
                data.forEach(function(entry) {
                    aRow[name].data.push(entry[name]);
                });
                hcdata.series.push(aRow[name]);
            });
            console.log(JSON.stringify(hcdata));
            $('#container').highcharts(hcdata);
        }
    });
});
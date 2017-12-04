
$(".ui#rating").rating();

$("#rating .icon").click(function() {
    var rate = $(this).attr('data');
    $.post(base_url + "rating/submit", {rate: rate, plant_id: plant_id});
});

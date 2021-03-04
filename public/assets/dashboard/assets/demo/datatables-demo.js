// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});

$(document).ready(function() {
  $('#dataProsesTable').DataTable({
  	"searching": false,
  	"bLengthChange": false,
  	"pageLength": 5
  });
});

$(document).ready(function() {
  $('#dataDeliverTable').DataTable({
  	"searching": false,
  	"bLengthChange": false,
  	"pageLength": 5
  });
});

$(document).ready(function() {
  $('#dataArriveTable').DataTable({
  	"searching": false,
  	"bLengthChange": false,
  	"pageLength": 5
  });
});

$(document).ready(function() {
  $('#dataAcceptTable').DataTable({
  	"searching": false,
  	"bLengthChange": false,
  	"pageLength": 5
  });
});

$(document).ready(function() {
  $('#dataRejectTable').DataTable({
  	"searching": false,
  	"bLengthChange": false,
  	"pageLength": 5
  });
});

$(document).ready(function() {
  $('#dataCartTable').DataTable({
    "searching": false,
    "bLengthChange": false,
    "pageLength": 5
  });
});

$(document).ready(function() {
  $('#dataCategoryTable').DataTable({
    "bLengthChange": false,
    "pageLength": 5
  });
});

$(document).ready(function() {
  $('#dataMenuTable').DataTable({
    "bLengthChange": false,
    "pageLength": 5
  });
});

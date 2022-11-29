// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTable').DataTable({
    dom: 'Bfrtip',
    buttons: [
      { "extend": 'pdf', "text": '<span class="btn btn-primary">Excel</span>'}
    ]
  });
});
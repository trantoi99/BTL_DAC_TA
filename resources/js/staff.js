$(document).ready(function(){
    loadTables();
});
//Yajra Laravel
function loadTables(){
    $('#myTable').DataTable({
        pageLength: 10,
        processing: true,
        serverSide: true,
        "bSort": false,
        "responsive": true,
        ajax: {
            url: "/api/staff/index",
        },
        columns : [
            { data: 'Ten_Nv', name: 'Ten_Nv', 'className': 'text-center', orderable: false },
            { data: 'Tuoi', name: 'Tuoi', orderable: false},
            { data: 'Gioi_Tinh', name: 'Gioi_Tinh', orderable: false},
            { data: 'SDT', name: 'SDT', orderable: false},
            { data: 'Ca_lam_viec', name: 'Ca_lam_viec', orderable: false},
            { data: 'Luong', name: 'Luong', orderable: false},
            { data: 'action', name: 'action', 'className': 'text-center' ,  orderable: false, 'searchable': false }
        ]
    });
};

//Reload tables
function reloadTables() {
    $("#myTable").DataTable().ajax.reload();
};

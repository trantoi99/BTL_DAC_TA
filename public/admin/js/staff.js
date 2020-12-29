
$(document).ready(function(){
    //csrf token get ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    loadTables();
    $("#save").on("click", function(){
        var id = $(this).attr("data-id");
        if(id == "")
        {
            insert();
        }
        else{
            update(id);
        }
    });
    $("#Modal").on("show.bs.modal", function(e){
        const action = $(e.relatedTarget).data('action');
        if(action != undefined){
            if(action == "edit"){
                const keys = ['ten' , 'tuoi', 'gioitinh', 'sdt', 'ca', 'luong'];

                keys.map(item => {
                    var data = $(e.relatedTarget).attr("data-" + item);
                    $("#" + item).val(data);
                });

                var id = $(e.relatedTarget).attr("data-id");
                $("#save").attr("data-id", id);
            }
            if(action == "add"){

                $("#save").attr("data-id", "");
                $("#form-input .form-control").map(function(){
                    $(this).val("");
                })
            }
        }
    })
});
function insert(){
    var formData = $("#form-input").serialize();
    $.ajax({
        method: "POST",
        url: "/api/staff/insert",
        data: formData,
        dataType: 'json',

        success: function(msg){
            if(msg.success){
                $("#Modal").modal('toggle');
                alert(msg.message);
                reloadTables();
            }
            else{
                alert(msg.message);
            }
        },

        error: function(err){
            console.log(err.statusText);
        }
    })
};
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


function deleteData(id)
{
    Swal.fire({
        title: "Bạn có muốn xóa không?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Thoát",
        confirmButtonText: "Xóa",
    }).then(result => {
        if(result.value){
            $.get("/api/staff/delete/" + id).then(function(msg){
                alert(msg.message);
                reloadTables();
            }).catch(function(error){
                console.log(error.statusText);
            });
        }
    })
};

function update(id)
{
    var formData = $("#form-input").serialize() + "&" + "Id_Nv=" + id;
    console.log(formData);
    $.ajax({
        method: "POST",
        url: "/api/staff/update",
        data: formData,
        dataType: 'json',

        success: function(msg){
            if(msg.success){
                $("#Modal").modal('toggle');
                alert(msg.message);
                reloadTables();
            }
            else{
                alert(msg.message);
            }
        },

        error: function(err){
            console.log(err.statusText);
        }
    })
}

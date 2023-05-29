const loaderHTML = document.createElement('div');
loaderHTML.setAttribute('id', 'pre-loader');
loaderHTML.innerHTML = "<div id='loader-container'><div></div><div></div><div></div></div>";
window.start_loader = function () {
    if (!document.getElementById('pre-loader') || (!!document.getElementById('pre-loader') && document.getElementById('pre-loader').length <= 0)) {
        document.querySelector('body').appendChild(loaderHTML);
    }
}
window.end_loader = function () {
    if (!!document.getElementById('pre-loader')) {
        document.getElementById('pre-loader').remove();
    }
}

function remove_screen(e) {
    if ($(e).parent().parent().attr('id') != 'list_1') {
        $(e).parent().parent().remove()
    }
}

$(function () {
    console.log("comes");
    setTimeout(() => {
        end_loader()
    }, 500)

    var myDate = new Date();
    var hrs = myDate.getHours();
    var greet;
    if (hrs < 12)
        greet = 'Good Morning';
    else if (hrs >= 12 && hrs <= 17)
        greet = 'Good Afternoon';
    else if (hrs >= 17 && hrs <= 24)
        greet = 'Good Evening';
    // document.getElementById('greeting').innerHTML = '<b>' + greet + '</b>';

    $("#add_screen").on("click", function() {
        console.log("add screen");
        
        var default_ = $('.screen_lists #list_1').clone();
        var len = $('.screen_lists .row').length;
        default_.attr('id', 'list_'+(len+1));

        $('.screen_lists').append(default_)

    });

    $(".edit_project").on("click", function() {
        console.log("project open modal");
        var project_id = $(this).data('project_id');
        console.log(project_id);

        var data = {}
        data['project_id '] = project_id

        if (project_id) {
            $.ajax({
                url: "controllers/projects/get.php",
                method: 'GET',
                type: 'GET',
                dataType: 'json',
                data: {'project_id': project_id},
                error: err => {
                    console.log(err)
                    alert("Error occured")
                },
                success: function (res) {
                    if (res.status == '200') {
                        console.log("done")
                        console.log(res.data);
                        var data = res.data;

                        var modal = $("#project_create_edit_modal");
                        modal.find("input[name='project_id']").val(data.project_id);
                        modal.find("input[name='title']").val(data.project_title);
                        modal.find("textarea[name='description']").val(data.project_desc);

                        modal.find('.screen_lists #list_1 input[name="screen_lists[]"]').val(data.screens[0].screen_name);
                        
                        for (var i = 1; i < data.screens.length; i++) {
                            var default_ = $('.screen_lists #list_1').clone();
                            var len = $('.screen_lists .row').length;
                            default_.attr('id', 'list_'+(len+1));
                            
                            $('.screen_lists').append(default_)
                            modal.find('.screen_lists #list_'+(i+1)+' input[name="screen_lists[]"]').val(data.screens[i].screen_name);
                        }


                    } else if (res.status == '503') {
                        alert("Unable to get project details")
                    } else {
                        alert("Unable to get project details. Data is incomplete");
                    }
                    $("#project_create_edit_modal").show()
                }
            })
        }
    });

    $("#project_btn").on("click", function() {
        console.log("project");

        var project_id = $("input[name='project_id']").val()
        console.log(project_id);

        var form = $('#project-form');
        var form_data = new FormData($(form)[0])     
        
        if (!project_id) {
            $.ajax({
                url: "controllers/projects/add.php",
                data: form_data,
                cache : false,
                contentType: false,
                dataType: 'json',
                processData: false,
                type: 'POST',
                method: 'POST',
                error: err => {
                    console.log(err)
                    alert("Error occured")
                },
                success: function (res) {
                    if (res.status == '200') {
                        console.log("done")
                    } else if (res.status == '503') {
                        alert("Unable to create project")
                    } else {
                        alert("Unable to create project. Data is incomplete.");
                    }
                    $("#project_create_edit_modal").click()
                    window.location.href="projects.php";
                }
            })
        } else {
            console.log("edit project")
        }
    });
});
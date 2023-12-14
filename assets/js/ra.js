// When the user clicks the button, open the modal
$("#ra_add_btn").click(function () {
  $("#ra_confirm_btn").show();
  $("#ra_generator").val("");
  $("#ra_tso").val("");
  $("#ra_name").val("");

  $("#ra_confirm_btn").attr("value", "save");
  $("#ra_Modal").show();
});

$("#ra_hide").click(function () {
  $("#ra_Modal").hide();
});
$("#ra_close_btn").click(function () {
  $("#ra_Modal").hide();
});

//ADD RA
//console.log($('#saveTso').length);
function ra_save(type) {
  var id = $("#ra_name").attr("no");
  var generator = $("#ra_generator").val();
  var tso = $("#ra_tso").val();
  var name = $("#ra_name").val();
  var data = {
    ra_generator: generator,
    ra_tso: tso,
    ra_name: name,
    ra_id: id,
    type: type,
  };
  console.log(data);
  $.ajax({
    type: "POST",
    url: "codes/codeRa.php",
    data: data,
    success: function (res) {
      var result = JSON.parse(res);
      //console.log("result: ", result);
      if(result.status  == 422){
        $('#errorMessage').removeClass('d-none');
        $('#errorMessage').text(result.message);
      }else if(result.status  == 200){
        $("#ra_Modal").hide();
        alertify.set("notifier", "position", "top-center");
        alertify.success(result.message);
        //refresh
        $(document).ready(function () {
          $("#panel").load("database/ra.php");
        });
      }
      
    },
    error: function (xhr, status, error) {},
  });
}
//EDIT Ra
$("table").on("click", ".editRaBtn", function () {
  var generator = $(this).parent().siblings(".generator").text();
  var tso = $(this).parent().siblings(".tso").text();
  var name = $(this).parent().siblings(".name").text();
  var id = $(this).attr("value");

  $("#ra_confirm_btn").show();
  $("#ra_generator").attr("readonly", false);
  $("#ra_tso").attr("readonly", false);
  $("#ra_name").attr("readonly", false);

  $("#ra_generator").val(generator);
  $("#ra_tso").val(tso);
  $("#ra_name").val(name);
  $("#ra_name").attr("no", id);

  $("#ra_confirm_btn").attr("value", "update");
  $("#ra_Modal").show();
});

$("#ra_confirm_btn").click(function (e) {
  var type = $(this).attr("value");
  if (type == "save") {
    ra_save("save_ra"); // don't undestand
  } else ra_save("update_ra");
});

$("table").on("click", ".deleteRaBtn", function () {
  var id = $(this).attr("value");
  delete_ra(id);
});

function delete_ra(id) {
  $.ajax({
    type: "POST",
    url: "codes/codeRa.php",
    data: { ra_id: id, type: "delete_ra" },
    success: function (res) {
      var result = JSON.parse(res);
      alertify.set("notifier", "position", "top-center");
      alertify.error(result.message);
      //refresh
      $(document).ready(function () {
        $("#panel").load("database/ra.php");
      });
    },
    error: function (xhr, status, error) {},
  });
}

$("table").on("click", ".viewRaBtn", function () {
  var generator = $(this).parent().siblings(".generator").text();
  var tso = $(this).parent().siblings(".tso").text();
  var name = $(this).parent().siblings(".name").text();
  var id = $(this).attr("value");

  $("#ra_generator").val(generator);
  $("#ra_tso").val(tso);
  $("#ra_name").val(name);

  $("#ra_generator").attr("readonly", true);
  $("#ra_tso").attr("readonly", true);
  $("#ra_name").attr("readonly", true);
  $("#ra_name").attr("no", id);

  $("#ra_confirm_btn").hide();
  $("#ra_Modal").show();
});

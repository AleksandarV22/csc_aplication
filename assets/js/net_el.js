// When the user clicks the button, open the modal
$("#net_add_btn").click(function () {
  $("#net_confirm_btn").show();
  $("#net_node1").val("");
  $("#net_node2").val("");
  $("#net_name").val("");
  $("#net_ptdf").val("");
  $("#net_tso1").val("");
  $("#net_tso2").val("");

  $("#net_node1").attr("readonly", false);
  $("#net_node2").attr("readonly", false);
  $("#net_name").attr("readonly", false);
  $("#net_ptdf").attr("readonly", false);
  $("#net_tso1").attr("disabled", false);
  $("#net_tso2").attr("disabled", false);

  $("#net_confirm_btn").attr("value", "save");
  $("#net_Modal").show();
});

$("#net_times").click(function () {
  $("#net_Modal").hide();
});
$("#net_close_btn").click(function () {
  $("#net_Modal").hide();
});

//ADD NET_EL

function net_save(type) {
  var id = $("#net_name").attr("no");
  var node1 = $("#net_node1").val();
  var node2 = $("#net_node2").val();
  var name = $("#net_name").val();
  var ptdf = $("#net_ptdf").val();
  var tso1 = $("#net_tso1").val();
  var tso2 = $("#net_tso2").val();
  var data = {
    net_node1: node1,
    net_node2: node2,
    net_name: name,
    net_ptdf: ptdf,
    net_tso1: tso1,
    net_tso2: tso2,
    net_id: id,
    type: type,
  };
  console.log(data);
  $.ajax({
    type: "POST",
    url: "codes/codeNet.php",
    data: data,
    success: function (res) {
      var result = JSON.parse(res);
      //console.log("result: ", result);
      if (result.status == 422) {
        $("#errorMessage").removeClass("d-none");
        $("#errorMessage").text(result.message);
      } else if (result.status == 200) {
        $("#net_Modal").hide();
        alertify.set("notifier", "position", "top-center");
        alertify.success(result.message);
        //refresh
        $(document).ready(function () {
          $("#panel").load("database/net_el.php");
        });
      }
    },
    error: function (xhr, status, error) {},
  });
}

//EDIT TSO
$("table").on("click", ".editNetBtn", function () {
  var id = $(this).attr("value");
  var node1 = $(this).parent().siblings(".net-node1").text();
  var node2 = $(this).parent().siblings(".net-node2").text();
  var name = $(this).parent().siblings(".net-name").text();
  var ptdf = $(this).parent().siblings(".net-name-ptdf").text();
  var tso1 = $(this).parent().siblings(".net-tso1").text();
  var tso2 = $(this).parent().siblings(".net-tso2").text();

  $("#net_node1").attr("readonly", false);
  $("#net_node2").attr("readonly", false);
  $("#net_name").attr("readonly", false);
  $("#net_ptdf").attr("readonly", false);
  $("#net_tso1").attr("disabled", false);
  $("#net_tso2").attr("disabled", false);

  $("#net_node1").val(node1);
  $("#net_node2").val(node2);
  $("#net_name").val(name);
  $("#net_ptdf").val(ptdf);
  $("#net_tso1").val(tso1);
  $("#net_tso2").val(tso2);

  $("#net_name").attr("no", id);

  $("#net_confirm_btn").show();
  $("#net_confirm_btn").attr("value", "update");
  $("#net_Modal").show();
});

$("#net_confirm_btn").click(function (e) {
  var type = $(this).attr("value");
  if (type == "save") {
    net_save("save_net");
  } else net_save("update_net");
});

$("table").on("click", ".deleteNetBtn", function () {
  var id = $(this).attr("value");
  delete_net(id);
});

function delete_net(id) {
    if(confirm('Are you sure you want to delete this data?')){
    $.ajax({
      type: "POST",
      url: "codes/codeNet.php",
      data: { net_id: id, type: "delete_net" },
      success: function (res) {
        var result = JSON.parse(res);
        alertify.set("notifier", "position", "top-center");
        alertify.error(result.message);
        //refresh
        $(document).ready(function () {
          $("#panel").load("database/net_el.php");
        });
      },
      error: function (xhr, status, error) {},
    });
  }
}

$("table").on("click", ".viewNetBtn", function () {
  var node1 = $(this).parent().siblings(".net-node1").text();
  var node2 = $(this).parent().siblings(".net-node2").text();
  var name = $(this).parent().siblings(".net-name").text();
  var ptdf = $(this).parent().siblings(".net-name-ptdf").text();
  var tso1 = $(this).parent().siblings(".net-tso1").text();
  var tso2 = $(this).parent().siblings(".net-tso2").text();

  $("#net_node1").attr("readonly", true);
  $("#net_node2").attr("readonly", true);
  $("#net_name").attr("readonly", true);
  $("#net_ptdf").attr("readonly", true);
  $("#net_tso1").attr("disabled", true);
  $("#net_tso2").attr("disabled", true);

  $("#net_node1").val(node1);
  $("#net_node2").val(node2);
  $("#net_name").val(name);
  $("#net_ptdf").val(ptdf);
  $("#net_tso1").val(tso1);
  $("#net_tso2").val(tso2);

  $("#net_confirm_btn").hide();
  $("#net_Modal").show();
});

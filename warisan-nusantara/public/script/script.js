$(document).ready(function () {
  //ajax
  $.ajax({
    //retrive.php
    url: "retrieve_bridge.php",
    type: "get",
    success: function (data) {
      let semuaCollection = data.semuaCollection;
      let currentCategory = "all";

      function filterCard(category) {
        $("#card-content").empty();

        $.each(semuaCollection, function (i, koleksi) {
          if (category === "all collections") {
            $("#view-collection").text("all collections");
            $("#card-content").append(
              '<div class="col-md-4"><div class="card my-3"><img class="card-img-top" src="images/' +
                koleksi.gambar +
                '" /><div class="card-body"><h5 class="card-title">' +
                koleksi.nama +
                '</h5><h5 class="card-title">Category: ' +
                koleksi.kategori +
                '</h5><p class="card-text">' +
                koleksi.desc +
                '</p><h5 class="card-title">Date:' +
                koleksi.date +
                '</h5><button class="btn btn-primary update-card mx-2" id="' +
                koleksi.nama +
                '">Update Details</button>' +
                '<button class="btn btn-danger delete-card" data-id="' +
                koleksi.nama +
                '">Delete</button></div></div></div>'
            );
          } else if (category === koleksi.kategori) {
            $("#view-collection").text(currentCategory + " collections");
            $("#card-content").append(
              '<div class="col-md-4"><div class="card my-3"><img class="card-img-top" src="images/' +
                koleksi.gambar +
                '" /><div class="card-body"><h5 class="card-title">' +
                koleksi.nama +
                '</h5><h5 class="card-title">Category: ' +
                koleksi.kategori +
                '</h5><p class="card-text">' +
                koleksi.desc +
                '</p><h5 class="card-title">Date:' +
                koleksi.date +
                '</h5><button class="btn btn-primary update-card mx-2" id="' +
                koleksi.nama +
                '">Update Details</button>' +
                '<button class="btn btn-danger delete-card" data-id="' +
                koleksi.nama +
                '">Delete</button></div></div></div>'
            );
          }
        });
      }

      filterCard(currentCategory);

      //add click event listener to navbar items
      $(".nav-item").click(function () {
        currentCategory = $(this).data("category");
        $(".nav-item").removeClass("active");
        $(this).addClass("active");
        filterCard(currentCategory);
      });
    },
    error: function (error) {
      console.log(error);
    },
  });

  //edit card
  function editCard(itemname) {
    // Construct the URL to edititem.html with the item name as a query parameter
    var editUrl = "edititem.html?name=" + encodeURIComponent(itemname);
    
    // Navigate to edititem.html
    window.location.href = editUrl;
  }

  //delete card
  function deleteCard(itemname) {
    $.ajax({
      url: "bridge3.php",
      type: "POST",
      data: { id: itemname },
      success: function (response) {
        console.log("Delete response:", response);
        location.reload();
      },
      error: function (error) {
        console.log("Delete error:", error);
      },
    });
    // //
    console.log("Delete in delete function:", itemname);
  }

  // // ...

  // // Update the event listener for the "Go Somewhere" button
  // $(document).on("click", ".btn-primary", addEditDeleteButtons);

  // Click event listener for "Go somewhere" button
  $(document).on("click", ".update-card", function () {
    var idValue = $(this).attr("id");
    editCard(idValue);
  });

  // Click event listener for "Delete" button
  $(document).on("click", ".delete-card", function () {
    var itemname = $(this).data("id");
    deleteCard(itemname);
  });
});

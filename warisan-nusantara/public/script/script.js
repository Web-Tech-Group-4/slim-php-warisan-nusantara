$(document).ready(function () {
  
    //ajax
    $.ajax({
      url: "backend/retrieve.php",
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
                  '</h5><button class="btn btn-primary go-somewhere" id="' +
                  koleksi.nama +
                  '">Go somewhere</button>' +
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
                  '</h5><button class="btn btn-primary go-somewhere" id="' +
                  koleksi.nama +
                  '">Go somewhere</button>' +
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
  
    // function addEditDeleteButtons() {
    //   // Create the Edit button
    //   var editButton = document.createElement("button");
    //   editButton.textContent = "Edit";
  
    //   // Create the Delete button
    //   var deleteButton = document.createElement("button");
    //   deleteButton.textContent = "Delete";
  
    //   // Add event listeners to the Edit and Delete buttons
    //   editButton.addEventListener("click", editCard);
    //   deleteButton.addEventListener("click", deleteCard);
  
    //   // Append the Edit and Delete buttons to the card
    //   var cardBody = this.parentNode;
    //   cardBody.appendChild(editButton);
    //   cardBody.appendChild(deleteButton);
  
    //   // Remove the "Go Somewhere" button
    //   this.remove();
    // }
  
    // function editCard() {
    //   // Logic for editing the card
    //   console.log("Editing the card...");
    // }
  
    function deleteCard(itemname) {
      $.ajax({
        url: "backend/delete_card.php",
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
    $(document).on("click", ".go-somewhere", function () {
      var idValue = $(this).attr("id");
      console.log("Button ID value:", idValue);
    });
  
    // Click event listener for "Delete" button
    $(document).on("click", ".delete-card", function () {
      var itemname = $(this).data("id");
      deleteCard(itemname);
    });
  });
(function($) {
    "use strict";

    const search = document.getElementById("search");

    document.querySelector("#form").addEventListener("click", function(e) {
        e.preventDefault();

        const value = search.value.trim();

        if (value === "") return;

        $.ajax({
            url: "/customers/" + value + "/search",
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $("#searched-customer").remove();
                $("#no-result").remove();

                if (response) {
                    $(".search-box").after(`
                        <div class="ml-md-5 col-12 mt-2 d-flex justify-content-center align-items-center mb-2" id="searched-customer">
                            <div class="row">
                                <li class="col-md-5 mb-2 list-group-item">
                                    <span>
                                        Full Name: ${response.full_name}
                                    </span>
                                </li>
                                <li class="col-md-5 mb-2 list-group-item">
                                    <span>Phone: ${response.phone}</span>
                                </li>
                                <li class="col-md-5 mb-2 list-group-item">
                                    <span>Email: ${response.email}</span>
                                </li>
                                <li class="col-md-5 mb-2 list-group-item">
                                    <span>ID: ${response.identity_card}</span>
                                </li>
                            </div>
                        </div>
                    `);
                } else {
                    $(".search-box")
                        .after(`<div class="col-md-10 mb-2 text-center" id="no-result">Customer has not been found
                  </div>`);
                }
            }
        });
    });
})(jQuery); // End of use strict

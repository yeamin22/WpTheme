// Starting the script on page load. demoObj

jQuery(document).ready(function () {
  var demoType,
    ajaxurl = demoObj.ajaxurl;

  jQuery(document).on("click", ".yhpot_import_demo_open", function (e) {
    let demo_id = jQuery(this).data("demo-id");
    jQuery("#demo_item_" + demo_id).css("display", "block");
    jQuery(".demo-import-overlay").css("display", "block");
    demoType = demo_id;
    e.preventDefault();
  });

  jQuery(document).on("click", ".yhpot_close_popup", function (e) {
    let demo_id = jQuery(this).data("demo-id");
    jQuery("#demo_item_" + demo_id).css("display", "none");
    jQuery(".demo-import-overlay").css("display", "none");
    e.preventDefault();
  });

  /* 
    Ajax Installing Required PLugins 
  */

  jQuery(".demo-required-plugins .install a").on("click", function (e) {
    var $this = jQuery(this),
      data = {
        action: "yhpot_ajax_install_plugin",
        _ajax_nonce: $this.data("nonce"),
        slug: $this.data("plugin"),
      };
    // Disable parallel plugin install
    jQuery("#demo_item_" + demoType).addClass("plugin-install-in-progress");
    $this.addClass("installing");

    jQuery.post(ajaxurl, data, function (response) {
      if (response.data.activatedPlugin) {
        jQuery(
          ".required-plugin-status a[data-plugin=" + response.data.slug + "]"
        )
          .html("Active")
          .css("pointer-events", "none");
      }
      $this.removeClass("installing");
      jQuery("#demo_item_" + demoType).removeClass(
        "plugin-install-in-progress"
      );
    });
    e.preventDefault();
  });

  /* Import data Functions */

  jQuery(".button_import_data").on("click", function (e) {
    var allImport = false,
      fetchAttachments = false,
      data,
      importArray,
      importContentArray;

    importArray = ["download"];

    importContentArray = [];

    let demoType = jQuery(this).data("demo-id");

    jQuery("#import-" + demoType + " input:checkbox:checked").each(function () {
      if (!this.disabled) {
        if ("content" === this.getAttribute("data-type")) {
          importContentArray.push(this.value);

          if (-1 === importArray.indexOf("content")) {
            importArray.push("content");
          }
        } else {
          importArray.push(this.value);
        }
      }

      if ("all" === this.value) {
        this.disabled = true;
        allImport = true;
      }
    });

    if (-1 !== importArray.indexOf("all")) {
      importArray.splice(importArray.indexOf("all"), 1);
      importArray.push("general_data");
    }
    if (
      0 < importContentArray.length &&
      -1 !== importContentArray.indexOf("attachment")
    ) {
      fetchAttachments = true;
    }

    importStagesLength = importArray.length;

    data = {
      action: "yhpot_import_demo_data",
      security: demoObj.nonce,
      demoType: demoType,
      importStages: importArray,
      contentTypes: importContentArray,
      fetchAttachments: fetchAttachments,
      allImport: allImport,
    };

    console.log(data);

    importDemo(data);
  });

  importDemo = function (data) {
    jQuery
      .post(ajaxurl, data, function (response) {
        console.log(response);
      })
      .fail(function (xhr, textStatus, errorThrown) {
        console.log(errorThrown);
      });
  };
});

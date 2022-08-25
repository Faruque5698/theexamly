$(function()
  {
    $("#portlet-card-list-1, #portlet-card-list-2, #portlet-card-list-3").sortable(
    {
      connectWith: "#portlet-card-list-1, #portlet-card-list-2, #portlet-card-list-3",
      items: ".portlet-card"
    });
  });
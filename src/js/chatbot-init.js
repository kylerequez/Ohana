$(document).ready(function() {
    $.ajax({
        url: "/chatbot/settings/get",
        type: "GET",
        error: function(error) {},
    }).done(function(data) {
        info = JSON.parse(data);
        avatar = info.avatar;
        name = info.name;
        intro = info.intro;
        noResponse = info.noResponse;
        createChatBot(
            (host = "/chatbot/responses/get"),
            (botLogo = avatar),
            (title = name),
            (welcomeMessage = intro),
            (inactiveMsg = noResponse),
            (theme = "orange")
        );
    });
});
function main() {
    $(".image_main").css(
        "-webkit-filter",
        "grayscale(" +
        $("#id1").val() +
        "%)    blur(" +
        $("#id2").val() +
        "px) brightness(" +
        $("#id3").val() +
        "%) sepia(" +
        $("#id4").val() +
        "%) opacity(" +
        $("#id5").val() +
        "%)    contrast(" +
        $("#id6").val() +
        "%) saturate(" +
        $("#id7").val() +
        "%) invert(" +
        $("#id8").val() +
        "%)"
    );
}
const rightBlock = document.getElementById("rightblock")
const image = document.getElementById("image")
const list = document.getElementById("list")

const defaultImageBorder = image.style.border;

function changeBackground(color) {
    rightBlock.style.backgroundColor = color
}

function changeFontColor(event) {
    const color = event.target.value;

    rightBlock.style.color = color
}

function changeFontSize(event) {
    const size = event.target.value;

    rightBlock.style.fontSize = size
}

function toggleBorder(event) {
    const value = event.target.checked;

    image.style.border = value ? defaultImageBorder : "none"
}

function listRadio(type) {
    list.style.listStyle = type
}
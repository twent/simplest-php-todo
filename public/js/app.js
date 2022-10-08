const checkboxes = document.querySelectorAll(
    'input[type="checkbox"][name="done"]'
)

checkboxes.forEach(checkbox => {
    checkbox.onclick = function () {
        this.parentNode.submit()
    }
})
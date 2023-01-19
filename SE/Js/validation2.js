const validation2 = new JustValidate("#login");

validation2
    .addField("#loginEmail", [
        {
            rule: "required"
        }
    ])
    
    .addField("#loginPass", [
        {
            rule: "required"
        }
    ])
    .onSuccess((event) => {
            document.getElementById("login").submit();
    });
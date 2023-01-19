const validation3 = new JustValidate("#contact");

validation3
    .addField("#name", [
        {
            rule: "required"
        }
    ])

    .addField("#email", [
        {
            rule: "required"
        }
        
    ])
    .addField("#comment", [
        {
            rule: "required"
        }
        
    ])

    .onSuccess((event) => {
        document.getElementById("contact").submit();
    });
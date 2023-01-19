
const validation = new JustValidate("#signup");

validation
    .addField("#signupEmail", [
        {
            rule: "required"
        }
    ])

    .addField("#signupPassword", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    // .addField("#signupcPassword", [
    //     {
    //         validator: (value, fields) => {
    //             return value === fields["#signupPassword"].elem.value;
    //         },
    //         errorMessage: "Passwords should match"
    //     }
    // ])
    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });

// const validation2 = new JustValidate("#login");

//     validation2
//         .addField("#loginEmail", [
//             {
//                 rule: "required"
//             }
//         ])
        
//         .addField("#loginPass", [
//             {
//                 rule: "required"
//             }
//         ])
//         .onSuccess((event) => {
//                 document.getElementById("login").submit();
//         });
        
    
    
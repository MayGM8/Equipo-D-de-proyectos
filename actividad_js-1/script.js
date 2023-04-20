// Adivinaron, ya casi está todo aquí
function numbers() {
    //funciòn para calcular el factorial de un nùmero 
    function factorial (n) {
        var total = 1; 
        for (i=1; i<=n; i++) {
            total = total * i; 
        }
        return total; 
    }

    //funciòn para calcular fibonacci de un nùmero 
    function fibonacci (n) {
        result = "FIB aun no funciona";
        return result; 

    }

    //funciòn para saber si un nùmero es primo
    function prime (n) {
        result = "PRIM aun no funciona";
        return result; 

    }

    //funciòn para saber si un nùmero es perfecto
    function perfect (n) {
        result = "PERF aun no funciona";
        return result; 

    }

    let fnumber =  document.getElementById("fnumber").value;
    let algorithm  = document.getElementById("algorithm").value;
    let result = "";
    


    if(fnumber == "" & algorithm == "select_an_option"){

        result = "Intenta nuevamente";

    }else{

        if(fnumber % 1 == 0){
            switch(algorithm){

                case algorithm = "factorial":
                    result = factorial(fnumber);
                    break;
                
                case "fibonacci":
                    result = fibonacci(fnumber);
                    break;
                    
                case "prime":            
                    result = prime(fnumber);
                    break;
                
                case "perfect":            
                    result = perfect(fnumber);
                    break;
                default:
                    result = "Oops!"            
            }            
        }else{
    
             result = "No ingresaste un nùmero entero :c";

        };
    };

    document.getElementById("result").value = result;



};
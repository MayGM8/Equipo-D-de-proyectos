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
        let a = 0,
      b = 1,
      c;
    if (n === 0) {
      return a;
    }
    for (let i = 2; i <= n; i++) {
      c = a + b;
      a = b;
      b = c;
    }
    return b;

    }

    //funciòn para saber si un nùmero es primo
    function prime (n) {
        let isPrime = true;
    if (n === 1) {
      isPrime = false;
    } else {
      for (let i = 2; i <= Math.sqrt(n); i++) {
        if (n % i === 0) {
          isPrime = false;
          break;
        }
      }
    }
    return isPrime;

    }

    //funciòn para saber si un nùmero es perfecto
    function perfect (n) {
        let sum = 0;
  for (let i = 1; i < n; i++) {
    if (n % i === 0) {
      sum += i;
    }
  }
  if (sum === n) {
    return "El número es perfecto";
  } else {
    return "El número no es perfecto";
  }

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

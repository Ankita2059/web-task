function cloneObject (obj) {
     //check if the input is an object and not null
    if (obj && typeof obj === 'object'){
        //  create a return Shallow copy of Object
        return Object.assign ({},obj);
    }
    else{
    throw new Error("Input is not an object");
    }
}
    const originalObject = {
    name: "John Doe",
    age: 30,
    address: {
    Street:"123 Main st",
    City:"anycity",
    Zip:"12345"
    }
};
    // clone the original object
    const clonedObject= cloneObject(originalobject);
    //Display the original and cloned objects
     Console.log("original oject:",originalObject); 
    Console.log("cloned object:", clonedObject);
    // Modify the Cloned object to  verify its shallowcopy
     clonedObject.name = "John";
      clonedObject.address.city="city";
    // Display the objects after modification
    Console.log("After Modification-original object:", originalObject);
     Console.log("After Modification-cloned object: ", clonedObject);
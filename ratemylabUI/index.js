const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const fs = require("fs");
app.use('/css', express.static('css'));
app.use(express.static('public'));
app.use(bodyParser.urlencoded({extended:false}));

app.set("view engine", "ejs");

app.get("/users",(req,res) =>{
    res.send("Now Home");
});

app.get("/test/:id", (req,res)=>{
    res.render("profile", {id:req.params.id});
});
app.listen(3000);
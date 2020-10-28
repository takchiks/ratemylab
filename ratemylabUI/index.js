const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const fs = require("fs");

app.use('/css', express.static('css'));
app.use('/img', express.static('img'));
app.use('/bootstrapcss', express.static('bootstrap/css'));


app.use(express.static('public'));
app.use(bodyParser.urlencoded({extended:false}));

app.set("view engine", "ejs");

app.get("/users",(req,res) =>{
    res.send("Now Home");
});

app.get("/test/:id", (req,res)=>{
    res.render("profile", {id:req.params.id});
});
app.get("/index", (req,res)=>{
    res.render("index");
});
app.get("/change_pw", (req,res)=>{
    res.render("change_pw");
});
app.get("/new_lab", (req,res)=>{
    res.render("new_lab");
});
app.get("/prev_lab", (req,res)=>{
    res.render("prev_lab");
});
app.post("/login", (req,res)=>{
    res.render("home");
});
app.listen(3000);
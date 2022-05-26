'use strict'

function Transport() {
  this.speed = 0;
  this.time = 0;
  this.basic_material = 'metal';
  this.planet = 'Earth';

  this.acceleration = function () {
    return this.speed/this.time;
  };
}

function Car() {
  Transport.call(this);
  this.basic_material = 'carbon';
  this.speed = 120;
  this.time = 10;

  this.acceleration = this.acceleration();
}

function Aircraft() {
  Transport.call(this);
  this.basic_material = 'aluminum';
  this.speed = 500;
  this.time = 20;

  this.acceleration = this.acceleration();
}

function Ship() {
  Transport.call(this);
  this.basic_material = 'iron';
  this.speed = 50;
  this.time = 25;

  this.acceleration = this.acceleration();
}

let t = new Transport();
let c = new Car();
let a = new Aircraft();
let s = new Ship();

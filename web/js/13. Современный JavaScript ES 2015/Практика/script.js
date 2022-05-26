'use strict';

class Transport {
    constructor(
        obj =
            {
                speed: 10,
                time: 2,
                basic_material: 'metal',
            },
        planet= 'Earth'
    ) {
        this.speed = obj.speed;
        this.time = obj.time;
        this.basic_material = obj.basic_material;
        this.planet = planet;

        this.acceleration = this.speed / this.time
    }
}

class Car extends Transport {
    constructor() {
        super({
                speed: 120,
                time: 10,
                basic_material: 'carbon',
            }
        )
    }
}

class Aircraft extends Transport {
    constructor() {
        super({
                speed: 500,
                time: 20,
                basic_material: 'aluminum',
            }
        )
    }
}

class Ship extends Transport {
    constructor() {
        super({
                speed: 50,
                time: 25,
                basic_material: 'iron',
            }
        )
    }
}


const t = new Transport();
const c = new Car();
const a = new Aircraft();
const s = new Ship();
////////////////////////////////////////////// 1)
var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        if (typeof b !== "function" && b !== null)
            throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var Rectangle = /** @class */ (function () {
    function Rectangle(a, b) {
        this.width = a;
        this.height = b;
    }
    Rectangle.prototype.Circumference = function () {
        return (2 * (this.width + this.height));
    };
    Rectangle.whoiam = function () {
        console.log("iam arectangle");
    };
    return Rectangle;
}());
;
/////////////////////////////////////////////////////////////////////////////   2)
var square = /** @class */ (function (_super) {
    __extends(square, _super);
    function square(c) {
        var _this = _super.call(this, c, c) || this;
        _this.width = _this.height = c;
        return _this;
    }
    square.prototype.whoiam = function () {
        console.log("Im a square");
    };
    square.prototype.Circumference = function () {
        return ((this.num * 2));
    };
    return square;
}(Rectangle));
//var rect= new Rectangle(2,3); 
//rect.Circumference();
//var squ=new square(3);
//square.displayName();
//////////////////////////////////////////////////////////////////////////// 3)
var Point = /** @class */ (function () {
    function Point(x, y) {
        this.x = x;
        this.y = y;
    }
    Point.prototype.length = function (p1) {
        return new p1(this.x + p1.x, this.y + p1.y);
    };
    return Point;
}());
;
var p1 = new Point(0, 10);
var p2 = new Point(10, 20);
var p3 = p1.length(p2);
////////////////////////////////////////////// 4)

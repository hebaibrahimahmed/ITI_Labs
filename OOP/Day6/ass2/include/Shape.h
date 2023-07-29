#ifndef SHAPE_H
#define SHAPE_H


class Shape
{
    public:
        Shape() {}
   public:

        int dim1;
        int dim2;


     virtual  int GetArea(){}
     virtual void WhoIam()
     {

     }
     virtual void Display()
     {

     }

    protected:

    private:
};

#endif // SHAPE_H

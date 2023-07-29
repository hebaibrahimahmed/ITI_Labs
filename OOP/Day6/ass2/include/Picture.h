#ifndef PICTURE_H
#define PICTURE_H
#include "Shape.h"

class Picture
{
    Shape **shape;
    public:
        Picture(Shape *arr[3])
        {

          shape=arr;
        }

         void Display(int Size){
            for(int i=0;i<Size;i++){
                shape[i]->Display();
            }
        }
    protected:

    private:
};

#endif // PICTURE_H

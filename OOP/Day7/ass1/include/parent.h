#ifndef PARENT_H
#define PARENT_H

class parent
{
    public:
        int A;
        parent() {}

    protected:
        int b;

    private:
      int c;

};

class child: public parent {

 public:
        child() {A = 10;}

    protected:
     int x;
    private:
      int y;

};


class derived:protected child{

 public:
        child() {};

 protected:

    X =5;
    A=6;

private:

    int N;

};

class child2:private derived{


 public:
        child() {s = 10;}

 protected:

   int k;

private:
    X = 8;
    A = 7;
    int p;
};



#endif // PARENT_H

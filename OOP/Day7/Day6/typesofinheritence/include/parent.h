#ifndef PARENT_H
#define PARENT_H

using namespace std;
class parent
{
    public:
        parent() {}
        int x;
        virtual void display(){
            cout << "hello i am parent";
        }

    protected:
        int y;
    private:
        int z;
};

#endif // PARENT_H

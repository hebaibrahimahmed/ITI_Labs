#include <stdio.h>
#include <stdlib.h>

typedef struct Node Node;
typedef struct Tree Tree;

struct Node
{
    int Data;
    Node *Left, *Right;
};

struct Tree
{
    Node *Root;
};

void Add(Tree *tree, int data)
{
    Node *node = malloc(sizeof(Node));
    node->Data = data;
    node->Left = node->Right = NULL;

    if(tree->Root == NULL)
    {
        tree->Root = node;
    }
    else
    {
        Node *current = tree->Root;
        Node *parent;

        while(current != NULL)
        {
            parent = current;

            if(data > current->Data)
                current = current->Right;
            else
                current = current->Left;
        }

        if(data > parent->Data)
            parent->Right = node;
        else
            parent->Left = node;
    }
}

Node* GetNodeByData(Tree *tree, int data)
{
    Node* current = tree->Root;

    while(current != NULL)
    {
        if(data == current->Data)
            return current;

        if(data > current->Data)
            current = current->Right;
        else
            current = current->Left;
    }

    return NULL;
}

Node* GetParent(Tree *tree, Node *node)
{
    Node *parent = tree->Root;

    while(parent != NULL)
    {
        if(parent->Left == node || parent->Right == node)
            return parent;

        if(node->Data > parent->Data)
            parent = parent->Right;
        else
            parent = parent->Left;
    }

    return NULL;
}

Node* GetMaxRight(Node *node)
{
    Node *current = node;

    while(current->Right != NULL)
    {
        current = current->Right;
    }

    return current;
}

void Remove(Tree *tree, int data)
{
    Node *node = GetNodeByData(tree, data);

    if(node == NULL)
        return;

    if(node == tree->Root)
    {
        if(node->Left == NULL && node->Right == NULL)
        {
            tree->Root = NULL;
        }
        else if(node->Right == NULL)
        {
            tree->Root = tree->Root->Left;
        }
        else if(node->Left == NULL)
        {
            tree->Root = tree->Root->Right;
        }
        else
        {
            Node *newRoot = tree->Root->Left;
            Node *maxRight = GetMaxRight(newRoot);

            maxRight->Right = tree->Root->Right;
            tree->Root = newRoot;
        }
    }
    else
    {
        Node *parent = GetParent(tree, node);
        Node *newChild;

        if(node->Left == NULL && node->Right == NULL)
        {
            newChild= NULL;
        }
        else if(node->Right == NULL)
        {
            newChild = node->Left;
        }
        else if(node->Left == NULL)
        {
            newChild = node->Right;
        }
        else
        {
            Node* newParent = node->Left;
            Node*maxRight = GetMaxRight(newParent);

            maxRight->Right = node->Right;

            newChild = newParent;
        }

        if(parent->Left == node)
            parent->Left = newChild;
        else
            parent->Right = newChild;
    }


    free(node);
}

void Display(Node *node)
{
    if(node == NULL)
        return;

    Display(node->Left);
    printf("%d  ", node->Data);
    Display(node->Right);
}

int GetMaxDepth(Node *node)
{

  if (node == NULL)  // wenn Root ist null , dann wir haben kein Baum
    return 0;

  //int leftDepth=0 , int rightDepth=0, maxDepth ;

   int leftDepth = GetMaxDepth(node->Left)+1;   //dann wir bekommen den Tief des Baumes bei Recursion
   int rightDepth = GetMaxDepth(node->Right)+1;


  if (leftDepth > rightDepth)
                                 // dann  soll ich checken , welcher ist tiefer
    return leftDepth + 1;
  else
    return rightDepth + 1;
}

int main()
{
    Tree tree;
    tree.Root = NULL;

    Add(&tree, 50);
    Add(&tree, 40);
    Add(&tree, 30);
    Add(&tree, 60);

    Display(tree.Root);

    printf(" \n");

int maxdepth =GetMaxDepth(tree.Root);

printf("The Maxdepth of the Tree is %d",maxdepth);


    return 0;
}




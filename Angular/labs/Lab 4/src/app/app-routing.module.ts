import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { PostComponent } from './post/post.component';
import { UserPostsComponent } from './user-posts/user-posts.component';

const routes: Routes = [
{path:'user/:id', component:UserPostsComponent},
{path:'',component:HomeComponent},
{path:'posts/:id', component:PostComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

<!-- <========= main-content starts =========> -->
<div class="main-content">

<!-- <========= Empty Post starts =========> -->
<div class="posts">
    <div class="post-card"> {{-- duplicate --}}

        <div class="post-card-text">
           
            <h3>Hello username, your feed is empty.</h3>
            <p class="desc">Your feed displays the latest posts from the people you follow. If you don’t have any friends to follow that’s okay; you can use the “Search” feature in the top menu bar to find content written by people with similar interests and then follow them.</p>
            
        </div>

        
    </div>
</div>

<!-- <================== Empty Post Ends ==================> -->
<!-- <========= Post starts =========> -->
<div class="posts">
    <div class="post-card"> {{-- duplicate --}}

        <div class="post-card-text">
            <small><img class="author-img" src="https://learnwebcode.github.io/pet-adoption-data/photos/meowsalot.webp" alt=""><span class="author">sullan</span><span class="follow">&#x2022; &nbsp;follow</span></small>
            
            <h3>test post</h3>
            <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum ex sunt porro, ea minus perferendis aspernatur voluptatem quam rerum, animi eaque voluptatum expedita reprehenderit accusamus esse doloremque, quis sint incidunt!</p>
            <a class="btn-read" href="#">Read now</a>
        </div>

        <div class="post-card-photo">
            <img class="post-card-img" src="images/advertisement.png" alt="">
        </div>
    </div>
</div>
<!-- <=========== Post Ends ==========> -->


</div>
<!-- <========= main-content ends =========> -->


{{-- Single post card --}}
        <div class="single-card">
            <div class="single-post-card">

                <div class="post-thumbnail">
                    <img class="a-img" src="https://s3.amazonaws.com/www-inside-design/uploads/2020/10/aspect-ratios-blogpost-1x1-1.png" alt="">
                </div>

                <div class="single-post-card-text">
                    <h3 class="s-p-c-title">Intellectual property and changing technology</h3>
                    
                    <div class="author-profile">
                        <div class="a-photo">
                            <img class="au-img" src="https://s3.amazonaws.com/www-inside-design/uploads/2020/10/aspect-ratios-blogpost-1x1-1.png" alt="">
                        </div>
                        <div class="a-text">
                            <h3>Written by ishan</h3>
                            <small>Date published : 6/7/2023</small>
                            <button class="btn-follow">Follow</button>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
        {{-- Ends Single post card --}}


/* single card */
.single-card{
    max-width: 700px;
    margin: 20px auto;
}

.single-post-card{
    display: grid;
    grid-template-columns: 1fr 2fr;
}
.post-thumbnail{
    overflow: hidden;
    border-radius: 10px;
    /* width: 250px; */
    /* height: 150px; */
    
}
.a-img{
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.single-post-card-text{
    margin: 0;
    padding-left: 25px;
}



.author-profile{
    display: flex;
    margin-top: 2rem;
    align-items: center;

}

.a-photo{
    width: 50px;
    height: 50px;
    overflow: hidden;
    border-radius: 50px;
    position: relative;
    top: -4px;
    /* height: 100px; */
}
a.img{
    width: 100%;
    height: 100%;
    /* height: 100%; */
}
.a-text{
    margin: 0;
    padding-left: .7rem;
    
}
.a-text h3{
    font-size: 1.2rem;
    font-weight: bold;
}

.a-text small{
   display: block;
   position: relative;
   top: -6px;
    
}

.btn-follow{
    background-color: #007bff;
    color: #fff;
    border: 1px solid #007bff;
    border-radius: 5px;
    font-weight: bold;
}

.btn-follow:hover{
    background-color: transparent;
    border: 1px solid #007bff;
    color: #007bff;
}

@media(max-width:412px){
    .post-thumbnail{
        width: 100px;
        height: 100px;
    }
    .single-post-card{
        grid-template-columns: auto 2fr;
    }
    .single-post-card-text{
        padding-left: 10px;
    }

    .s-p-c-title{
        font-size: 25px;
        font-weight: 600;
    }

    .author-profile{
        margin-top: 0.9rem;
    }

  
    .a-photo{
        width: 30px;
        height: 30px;
        
    }
   .au-img{
    width: 100%;
    height: 100%;
   }
    
}
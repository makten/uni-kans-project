<template>


    <div class="table-responsive" style="border-radius: 5px; padding: 5px;">

        <fieldset class="col-xs-12">

            <form class="form-horizontal" @submit.prevent="createPropositie">
                <fieldset>
                    <legend><h4>{{ subject }}</h4></legend>

                    <div class="form-group">
                        <label for="pro_name" class="col-md-2 control-label">Naam</label>

                        <div class="col-md-10">
                            <input type="text" class="form-control"
                                   v-model="pro_name"
                                   debounce="3000"
                                   placeholder="Naam">
                            <input type="hidden" v-model="hiddenName">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="textArea" class="col-md-2 control-label">Bescrijving</label>

                        <div class="col-md-10">
                                <textarea class="form-control" rows="3" id="textArea" v-model="pro_description"
                                          placeholder="Bescrijving"></textarea>
                                <span class="help-block"
                                      :style="{color: red}">U mag hier max. <strong>{{  num_char_desc - pro_description.length }} </strong>characters gebruiken</span>

                        </div>
                    </div>

                    <!--Dynamic population based on title and descriptoin-->

                    <div class="form-group">
                        <label for="pro_unique" class="col-md-2 control-label">Unique</label>
                        <div class="col-md-10">
                            <input id="pro_unique_input" type="text" class="form-control"
                                   v-model="pro_unique"
                                   placeholder="Unique"
                            >
                        </div>
                        <div v-if="unique_suggest.length >= 1" class="col-md-10 col-md-offset-2" id="tags_container">

                            <ul :class="'inline-list'" v-for="suggestion in unique_suggest"
                                style="float: left;">
                                <li :class="{'bounceOut rm-item': suggestion.added }" transition="bounceOut" class="animated">
                                        <span class="label label-info">{{ suggestion.text }}
                                            <a style="color: white;" @click="addToTags(suggestion)" href="javascript:void(0)" class="remove" tabindex="-1"
                                               title="Add">+
                                            </a>
                                        </span>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 0;">
                        <!-- inline style is just to demo custom css to put checkbox below input above -->
                        <div class="col-md-offset-2 col-md-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Checkbox
                                </label>
                                <label>
                                    <input type="checkbox" disabled=""> Disabled Checkbox
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" checked=""> Toggle button
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputFile" class="col-md-2 control-label">File</label>

                        <div class="col-md-10">
                            <input type="text" readonly="" class="form-control" placeholder="Browse...">
                            <input type="file" id="inputFile" multiple="">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="pro_status" class="col-md-2 control-label">Status</label>

                        <div class="col-md-10">
                            <select id="pro_status" class="form-control">
                                <option value="pilot">In pilot</option>
                                <option value="pilot">In progress</option>
                                <option value="pilot">Voltooid</option>

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label">Radios</label>

                        <div class="col-md-10">
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"
                                           checked="">
                                    Option one is this
                                </label>
                            </div>
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                    Option two can be something else
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="select222" class="col-md-2 control-label">Select Multiple</label>

                        <div class="col-md-10">
                            <select id="select222" multiple="" class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10">

                            <form action="/file-upload"
                                  class="dropzone"
                                  id="my-awesome-dropzone">

                            </form>
                        </div>
                    </div>

                    <input id="datething">
                    <input type="color">

                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <button type="button" class="btn btn-default">Cancel</button>
                            <button type="button" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>


            </fieldset>


    </div><!--/row-->

</template>

<style>
    .rm-item{
        display: none;
    }

    .tag
    {
        margin-right:2px;
        color:white;
        text-align:center;
        padding:3px;
        border-radius: 5px;
    }
</style>


<script>

    export default{
        data(){
            return{
                msg:'hello vue'
            }
        },
        components:{

        }
    }
</script>
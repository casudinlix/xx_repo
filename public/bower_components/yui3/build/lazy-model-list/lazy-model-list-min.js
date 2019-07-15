YUI.add("lazy-model-list",function(e,t){var n=e.Attribute.prototype,r=YUI.namespace("Env.Model"),i=e.Lang,s=e.Array,o="add",u="error",a="reset";e.LazyModelList=e.Base.create("lazyModelList",e.ModelList,[],{initializer:function(){this.after("*:change",this._afterModelChange)},free:function(e){var t;return e?(t=i.isNumber(e)?e:this.indexOf(e),t>=0&&delete this._models[t]):this._models=[],this},get:function(e){return this.attrAdded(e)?n.get.apply(this,arguments):s.map(this._items,function(t){return t[e]})},getAsHTML:function(t){return this.attrAdded(t)?e.Escape.html(n.get.apply(this,arguments)):s.map(this._items,function(n){return e.Escape.html(n[t])})},getAsURL:function(e){return this.attrAdded(e)?encodeURIComponent(n.get.apply(this,arguments)):s.map(this._items,function(t){return encodeURIComponent(t[e])})},indexOf:function(e){return s.indexOf(e&&e._isYUIModel?this._models:this._items,e)},reset:function(t,n){t||(t=[]),n||(n={});var r=e.merge({src:"reset"},n);return t=t._isYUIModelList?t.map(this._modelToObject):s.map(t,this._modelToObject),r.models=t,n.silent?this._defResetFn(r):(this.comparator&&t.sort(e.bind(this._sort,this)),this.fire(a,r)),this},revive:function(e){var t,n,r;if(e||e===0)return this._revive(i.isNumber(e)?e:this.indexOf(e));r=[];for(t=0,n=this._items.length;t<n;t++)r.push(this._revive(t));return r},toJSON:function(){return this.toArray()},_add:function(t,n){var r;n||(n={}),t=this._modelToObject(t),"clientId"in t||(t.clientId=this._generateClientId());if(this._isInList(t)){this.fire(u,{error:"Model is already in the list.",model:t,src:"add"});return}return r=e.merge(n,{index:"index"in n?n.index:this._findIndex(t),model:t}),n.silent?this._defAddFn(r):this.fire(o,r),t},_clear:function(){s.each(this._models,this._detachList,this),this._clientIdMap={},this._idMap={},this._items=[],this._models=[]},_generateClientId:function(){return r.lastId||(r.lastId=0),this.model.NAME+"_"+(r.lastId+=1)},_isInList:function(e){return!!("clientId"in e&&this._clientIdMap[e.clientId]||"id"in e&&this._idMap[e.id])},_modelToObject:function(e){return e._isYUIModel&&(e=e.getAttrs(),delete e.destroyed,delete e.initialized),e},_remove:function(t,n){return t._isYUIModel&&(t=this.indexOf(t)),e.ModelList.prototype._remove.call(this,t,n)},_revive:function(e){var t,n;return e<0?null:(t=this._items[e],t?(n=this._models[e],n||(n=new this.model(t),n._set("clientId",t.clientId),this._attachList(n),this._models[e]=n),n):null)},_afterModelChange:function(e){var t=e.changed,n=this._clientIdMap[e.target.get("clientId")],r;if(n)for(r in t)t.hasOwnProperty(r)&&(n[r]=t[r].newVal)},_defAddFn:function(e){var t=e.model;this._clientIdMap[t.clientId]=t,i.isValue(t.id)&&(this._idMap[t.id]=t),this._items.splice(e.index,0,t)},_defRemoveFn:function(e){var t=e.index,n=e.model,r=this._models[t];delete this._clientIdMap[n.clientId],"id"in n&&delete this._idMap[n.id],r&&this._detachList(r),this._items.splice(t,1),this._models.splice(t,1)}})},"@VERSION@",{requires:["model-list"]});
